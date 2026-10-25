#include <stdio.h>

int main() {
	int num_1, num_2;
    float out_1, out_2;

    scanf("%d %d", &num_1, &num_2);
    scanf("%f %f", &out_1, &out_2);

    printf("%d %d\n", num_1 + num_2, num_1 - num_2);
    printf("%.1f %.1f", out_1 + out_2, out_1 - out_2);

    return 0;
}
