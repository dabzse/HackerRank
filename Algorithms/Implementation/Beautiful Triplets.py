import os

#
# Complete the 'beautifulTriplets' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER d
#  2. INTEGER_ARRAY arr
#

def beautifulTriplets(d, arr):
    # Write your code here
    count = 0
    for i, val_i in enumerate(arr):
        for j, val_j in enumerate(arr[i+1:], start=i+1):
            if val_j - val_i == d:
                for k, val_k in enumerate(arr[j+1:], start=j+1):
                    if val_k - val_j == d:
                        count += 1
    return count


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()
    n = int(first_multiple_input[0])
    d = int(first_multiple_input[1])

    arr = list(map(int, input().rstrip().split()))
    result = beautifulTriplets(d, arr)

    fptr.write(str(result) + '\n')
    fptr.close()
