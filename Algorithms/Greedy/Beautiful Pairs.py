import os

#
# Complete the 'beautifulPairs' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY A
#  2. INTEGER_ARRAY B
#

def beautifulPairs(A, B):
    # Write your code here
    count = 0
    for i, a in enumerate(A):
        for j, b in enumerate(B):
            if a == b:
                count += 1
                B[j] = -1
                break
    return count + 1 if count != n else count - 1


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    A = list(map(int, input().rstrip().split()))
    B = list(map(int, input().rstrip().split()))

    result = beautifulPairs(A, B)

    fptr.write(str(result) + '\n')
    fptr.close()

