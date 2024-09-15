import os

#
# Complete the 'andProduct' function below.
#
# The function is expected to return a LONG_INTEGER.
# The function accepts following parameters:
#  1. LONG_INTEGER a
#  2. LONG_INTEGER b
#

def andProduct(a, b):
    # Write your code here
    shift_count = 0
    while a != b:
        a >>= 1
        b >>= 1
        shift_count += 1

    return a << shift_count


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    for n_itr in range(n):
        first_multiple_input = input().rstrip().split()

        a = int(first_multiple_input[0])
        b = int(first_multiple_input[1])

        result = andProduct(a, b)

        fptr.write(str(result) + '\n')

    fptr.close()
