#include <stdio.h>

int main() {

    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    char ch;
    char str[100];
    char sentence[100];

    scanf(" %c", &ch);
    printf("%c\n", ch);

    scanf(" %[^\n]", str);
    printf("%s\n", str);

    scanf("\n");
    scanf(" %[^\n]", sentence);
    printf("%s", sentence);

    return 0;
}
