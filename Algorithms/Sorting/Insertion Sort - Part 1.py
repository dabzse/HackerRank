#
# Complete the 'insertionSort1' function below.
#
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER_ARRAY arr
#

def insertionSort1(n, arr):
    # Write your code here
    key = arr[-1]
    j = n - 2

    while j >= 0 and arr[j] > key:
        arr[j + 1] = arr[j]
        print(" ".join(map(str, arr)))
        j -= 1

    arr[j + 1] = key
    print(" ".join(map(str, arr)))


if __name__ == '__main__':
    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    insertionSort1(n, arr)
