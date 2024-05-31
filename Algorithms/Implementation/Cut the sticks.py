import os

#
# Complete the 'cutTheSticks' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts INTEGER_ARRAY arr as parameter.
#

def cutTheSticks(arr):
    # Write your code here
    result = []
    while(len(arr) > 0):
        result.append(len(arr))
        min_val = min(arr)
        for idx, val in enumerate(arr):
            arr[idx] -= min_val
        while(arr.count(0) > 0):
            arr.remove(0)
    return result

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    result = cutTheSticks(arr)

    fptr.write('\n'.join(map(str, result)))
    fptr.write('\n')
    fptr.close()
