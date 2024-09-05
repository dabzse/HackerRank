import os

#
# Complete the 'chiefHopper' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY arr as parameter.
#

def chiefHopper(arr):
    # Write your code here
    low, high = 0, max(arr)

    while low < high:
        mid = (low + high) // 2
        energy = mid

        for h in arr:
            if energy < h:
                energy -= h - energy
            else:
                energy += energy - h
            if energy < 0:
                break

        if energy >= 0:
            high = mid
        else:
            low = mid + 1

    return low


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    result = chiefHopper(arr)

    fptr.write(str(result) + '\n')
    fptr.close()
