import os

#
# Complete the 'closestNumbers' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts INTEGER_ARRAY arr as parameter.
#

def closestNumbers(arr):
    # Write your code here
    arr.sort()
    min_diff = float('inf')
    closest_pairs = []
    for i in range(len(arr)-1):
        diff = arr[i+1] - arr[i]
        if diff == min_diff:
            closest_pairs.append([arr[i], arr[i+1]])
        elif diff < min_diff:
            min_diff = diff
            closest_pairs = [[arr[i], arr[i+1]]]
    result = []
    for pair in closest_pairs:
        result.extend(pair)
    return result


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    result = closestNumbers(arr)

    fptr.write(' '.join(map(str, result)))
    fptr.write('\n')
    fptr.close()

