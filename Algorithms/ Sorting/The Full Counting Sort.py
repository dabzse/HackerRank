#
# Complete the 'countSort' function below.
#
# The function accepts 2D_STRING_ARRAY arr as parameter.
#

def countSort(arr):
    # Write your code here
    n = len(arr)
    output = [[] for _ in range(100)]

    for i in range(n):
        index = int(arr[i][0])
        string = arr[i][1]
        if i < n // 2:
            output[index].append("-")
        else:
            output[index].append(string)

    result = []
    for sublist in output:
        result.extend(sublist)

    print(" ".join(result))


if __name__ == '__main__':
    n = int(input().strip())

    arr = []

    for _ in range(n):
        arr.append(input().rstrip().split())

    countSort(arr)
