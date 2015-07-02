#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <semaphore.h>
#include <signal.h>

int zajednicka_var, br_rand;
sem_t generiran,procitan;

void generiraj(void *arg)
{
	printf("Nit koja generira zadatke je pocela s radom. Broj zadataka=%d\n",br_rand);
	for(;br_rand!=0;br_rand--)
	{
		int sluc = rand()%1000000000;
		printf("Generiran broj %d\n", sluc);
		zajednicka_var = sluc;			//generiraj slucajni broj				//spremi ga u varijablu
		(void) sem_post(&generiran);			//javi dretvama da je generiran novi slucajni broj - SEMAFORO
		(void) sem_wait(&procitan);				//cekaj da dretva procita slucajni broj - SEMAFORO
	}
}

void racunaj(void *arg)
{
	int i=*((int *)arg);
	printf("Nit %d pocela s radom\n", i+1);
	while(br_rand!=0)
	{
		(void) sem_wait(&generiran);			//cekaj da dretva generiraj stavi sljedeci broj - SEMAFORO
		int pom=zajednicka_var;
		int suma=0;
		printf("Nit %d preuzela zadatak %d\n",i+1,pom);
		(void) sem_post(&procitan);				//javi dretvi generiraj da je globalna varijabla procitana - SEMAFORO
		int brojac;
		for(brojac=1;brojac<pom;brojac++) suma+=brojac;										//izracunaj sumu
		printf("Nit %d. Zadatak = %d, suma = %d\n",i+1, pom, suma);				//ispis sumu
	}
}

void brisanje()
{
	sem_destroy(&generiran);
	sem_destroy(&procitan);
}

int main(int argc, char *argv[])
{
	if(argc!=3)
	{
		printf("Molim 2 ulazna argumenta!\n");
		exit(1);
	}
	sigset(SIGINT,brisanje);
	srand(time(0));
	int br_dretvi;
	br_dretvi = strtol(argv[1], NULL, 10);
	br_rand = strtol(argv[2], NULL, 10);

	pthread_t id_generat;
	pthread_t *id_racunajuce;
	id_racunajuce = (pthread_t *) malloc (br_dretvi*sizeof(pthread_t));

	(void) sem_init(&generiran, 0, 0);
	(void) sem_init(&procitan, 0, 0);

	if(pthread_create(&id_generat, NULL, generiraj, NULL)!=0)
	{
		printf("Greska pri stvaranju niti!\n");
		exit(1);
	}
	int j;
	for(j=0;j<br_dretvi;j++)
	{
		if(pthread_create(&id_racunajuce[j], NULL, racunaj, &j)!=0)
		{
			printf("Greska pri stvaranju niti!\n");
			exit(1);
		}
		sleep(1);
	}
	pthread_join(id_generat, NULL);
	int ij;
	for(ij=0;ij<br_dretvi;ij++) pthread_join(id_racunajuce[ij], NULL);
	free(id_racunajuce);
	brisanje();
	return 0;
}
