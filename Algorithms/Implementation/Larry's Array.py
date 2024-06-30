import os

#
# Complete the 'larrysArray' function below.
#
# The function is expected to return a STRING.
# The function accepts INTEGER_ARRAY A as parameter.
#

def larrysArray(A):
    # Write your code here
    def count_inversions(arr):
        inv_count = 0
        for i, val_i in enumerate(arr):
            for j, val_j in enumerate(arr[i + 1 :], start=i + 1):
                if val_i > val_j:
                    inv_count += 1
        return inv_count

    inversions = count_inversions(A)
    if inversions % 2 == 0:
        return "YES"
    else:
        return "NO"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        A = list(map(int, input().rstrip().split()))

        result = larrysArray(A)

        fptr.write(result + '\n')

    fptr.close()
