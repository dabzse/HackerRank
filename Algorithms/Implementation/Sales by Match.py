import os

#
# Complete the 'sockMerchant' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER_ARRAY ar
#

def sockMerchant(n, ar):
    # Write your code here
    count = 0
    for i in set(ar):
        count += ar.count(i) // 2
    return count


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    ar = list(map(int, input().rstrip().split()))
    result = sockMerchant(n, ar)

    fptr.write(str(result) + '\n')
    fptr.close()
