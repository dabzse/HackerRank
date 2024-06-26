import os

#
# Complete the 'workbook' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER k
#  3. INTEGER_ARRAY arr
#

def workbook(n, k, arr):
    # Write your code here
    count = 0
    page = 1

    for problems in arr:
        for current_problem in range(1, problems + 1):
            if current_problem == page:
                count += 1
            if current_problem == problems or current_problem % k == 0:
                page += 1

    return count

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()
    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    arr = list(map(int, input().rstrip().split()))
    result = workbook(n, k, arr)

    fptr.write(str(result) + '\n')
    fptr.close()
