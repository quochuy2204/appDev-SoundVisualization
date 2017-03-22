#include "comm.h"
#include <stdio.h>
#include <string.h>
#include <curl/curl.h>

void send_data(double leq[]){
	char temp[30], postdata[200]="data=";	//post field name is give
	CURL *curl;
	CURLcode res;
	int i;
	//prepare the post data
	for (i=0; i<8; i++){
		sprintf(temp, "%.2f;", leq[i]);
		strcat(postdata, temp);
	}//end of for
	curl_global_init(CURL_GLOBAL_ALL);
	curl = curl_easy_init();
	if(curl){
		curl_easy_setopt(curl, CURLOPT_URL, URL);
		curl_easy_setopt(curl, CURLOPT_POSTFIELDS, postdata);
		res = curl_easy_perform(curl);
		if(res != CURLE_OK)
			fprintf(stderr, "curl_easy_perform failed: %s\n",
				curl_easy_strerror(res));
		curl_easy_cleanup(curl);
	}
	curl_global_cleanup;
}
