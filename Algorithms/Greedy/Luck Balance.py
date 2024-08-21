#!/bin/python3
import os

#
# Complete the 'luckBalance' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER k
#  2. 2D_INTEGER_ARRAY contests
#

def luckBalance(k, contests):
    # Write your code here
    luck = 0
    imp = []
    for i in contests:
        if i[1] == 0:
            luck += i[0]
        else:
            imp.append(i[0])
    imp.sort(reverse = True)
    for i in imp:
        if k > 0:
            luck += i
            k -= 1
        else:
            luck -= i
    return luck


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    contests = []

    for _ in range(n):
        contests.append(list(map(int, input().rstrip().split())))

    result = luckBalance(k, contests)

    fptr.write(str(result) + '\n')
    fptr.close()
