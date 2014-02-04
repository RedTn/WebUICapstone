/* fscanf example */
#include <stdio.h>
#include <stdlib.h>

int main ()
{
  char str [80];
  int i;
  int loop = 0;
  int num = 0;
  FILE * pFile;
  FILE * output;
  pFile = fopen ("formatted.txt","r");
  output = fopen("output.txt", "w+");
  while(1) {
  loop++;
  printf("On loop: %d\n", loop);
  fscanf (pFile, "%d", &num);
  if(num == 999) break;
   fscanf (pFile, "%s", str);
  fprintf(output,"class %s\n{\npublic ObjectId Id { get; set; }\n", str);
  for(i=0; i<num-1; i++) {
	 fscanf (pFile, "%s%*[^\n]", str);
	fprintf(output,"public string %s { get; set; }\n", str);
  }
  fprintf(output,"}\n");
  }
  fclose (pFile);
  fclose(output);

  return 0;
}
