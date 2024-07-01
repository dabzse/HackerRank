import os
import sys


#
# Complete the 'almostSorted' function below.
#
# The function accepts INTEGER_ARRAY arr as parameter.
#


def almostSorted(arr):
    # Write your code here
    n = len(arr)
    sorted_arr = sorted(arr)

    if arr == sorted_arr:
        print("yes")
        return

    l, r = 0, n - 1

    while l < n and arr[l] == sorted_arr[l]:
        l += 1

    while r >= 0 and arr[r] == sorted_arr[r]:
        r -= 1

    arr[l], arr[r] = arr[r], arr[l]

    if arr == sorted_arr:
        print("yes")
        print(f"swap {l + 1} {r + 1}")
        return

    arr[l], arr[r] = arr[r], arr[l]

    sub_array = arr[l : r + 1][::-1]
    if arr[:l] + sub_array + arr[r + 1 :] == sorted_arr:
        print("yes")
        print(f"reverse {l + 1} {r + 1}")
        return

    print("no")


if __name__ == "__main__":
    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    almostSorted(arr)
