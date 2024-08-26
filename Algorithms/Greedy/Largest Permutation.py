import os

#
# Complete the 'largestPermutation' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts following parameters:
#  1. INTEGER k
#  2. INTEGER_ARRAY arr
#

def largestPermutation(k, arr):
    # Write your code here
    n = len(arr)
    value_to_index = {value: i for i, value in enumerate(arr)}

    for i in range(n):
        if k == 0:
            break

        target_value = n - i

        if arr[i] == target_value:
            continue

        target_index = value_to_index[target_value]

        arr[i], arr[target_index] = arr[target_index], arr[i]

        value_to_index[arr[target_index]] = target_index
        value_to_index[arr[i]] = i

        k -= 1

    return arr


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    arr = list(map(int, input().rstrip().split()))

    result = largestPermutation(k, arr)

    fptr.write(' '.join(map(str, result)))
    fptr.write('\n')
    fptr.close()
