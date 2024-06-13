import os

#
# Complete the 'minimumDistances' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY a as parameter.
#

def minimumDistances(a):
    # Write your code here
    d = []
    for i, val_i in enumerate(a):
        for j, val_j in enumerate(a):
            if i != j and val_i == val_j:
                d.append(abs(i - j))
    if d:
        return min(d)
    else:
        return -1

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    a = list(map(int, input().rstrip().split()))

    result = minimumDistances(a)

    fptr.write(str(result) + '\n')
    fptr.close()
