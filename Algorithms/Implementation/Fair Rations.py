import os

#
# Complete the 'fairRations' function below.
#
# The function is expected to return a STRING.
# The function accepts INTEGER_ARRAY B as parameter.
#

def fairRations(B):
    # Write your code here
    count = 0
    for i in range(len(B) - 1):
        if B[i] % 2 == 1:
            count += 2
            B[i + 1] += 1
    if B[-1] % 2 == 1:
        return 'NO'
    else:
        return str(count)


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    N = int(input().strip())
    B = list(map(int, input().rstrip().split()))

    result = fairRations(B)

    fptr.write(result + '\n')
    fptr.close()
