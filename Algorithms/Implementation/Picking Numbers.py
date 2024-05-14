import os

#
# Complete the 'pickingNumbers' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY a as parameter.
#

def pickingNumbers(a):
    # Write your code here
    max = 0
    for i in a:
        if a.count(i) + a.count(i - 1) > max:
            max = a.count(i) + a.count(i - 1)
    return max

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    a = list(map(int, input().rstrip().split()))
    result = pickingNumbers(a)

    fptr.write(str(result) + '\n')
    fptr.close()
