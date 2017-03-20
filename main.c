#include <stdio.h>
#include "wave.h"
#include <math.h>	// user-defined header
#include "screen.h"
#include <signal.h>
#include <sys/wait.h>
#include <stdlib.h>


int main(int argc, char *argv[]){
	WAVHDR h;
	FILE *fp;	//file handle of wave file
	int ans, ret;
	short int sa[SAMPLE_RATE];
/*	if(argc<2){	//command line argument should contain wave file name
		printf("Usage: %s wave_file\n", argv[0]);
		return -1;
	}
	fp = fopen(argv[1], "r");	//open the wav file in read only
	if(fp==NULL){	//if the file name is not correct
		printf("Cannot open wav file %s\n", argv[1]);
		return  -1;
	}
*/
	while(1){
		ret = system("arecord -r16000 -c1 -d1 -f S16_LE -q data.wav");
		if(WIFSIGNALED(ret)&& WTERMSIG(ret)==SIGINT) break;
		clearScreen();	//make a fresh screen
		fp=fopen("data.wav", "r");
		fread(&h, sizeof(h), 1, fp);	//read the wav header
		dispWAVHDR(h);	//display the wav header info
		fread(&sa, sizeof(short int), SAMPLE_RATE , fp);
		dispWAVdata(sa);
		fclose(fp);	//close the opened file
	}
	printf("Do you want to generate a testtone?)(1:yes , 0:no) ");
	scanf("%d", &ans);
	if(ans==1) testTone(1000, 5);
}

//function definiton

