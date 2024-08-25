import os

#
# Complete the 'toys' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY w as parameter.
#

def toys(w):
    # Write your code here
    w.sort()
    i = 0
    count = 0
    while i < len(w):
        j = i
        while j < len(w) and w[j] - w[i] <= 4:
            j += 1
        count += 1
        i = j
    return count


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    w = list(map(int, input().rstrip().split()))

    result = toys(w)

    fptr.write(str(result) + '\n')
    fptr.close()
