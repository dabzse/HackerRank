import os

#
# Complete the 'pylons' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER k
#  2. INTEGER_ARRAY arr
#

def pylons(k, arr):
    # Write your code here
    n = len(arr)
    pylons_count = 0
    i = 0
    while i < n:
        pylon_position = -1
        for j in range(min(i + k - 1, n - 1), i - k, -1):
            if arr[j] == 1:
                pylon_position = j
                break

        if pylon_position == -1:
            return -1

        pylons_count += 1
        i = pylon_position + k

    return pylons_count


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    arr = list(map(int, input().rstrip().split()))

    result = pylons(k, arr)

    fptr.write(str(result) + '\n')
    fptr.close()
