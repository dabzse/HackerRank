import os

#
# Complete the 'sumXor' function below.
#
# The function is expected to return a LONG_INTEGER.
# The function accepts LONG_INTEGER n as parameter.
#

def sumXor(n):
    # Write your code here
    count = 0
    while n:
        if n % 2 == 0:
            count += 1
        n //= 2
    return 2**count


if __name__ == "__main__":
    fptr = open(os.environ["OUTPUT_PATH"], "w")

    n = int(input().strip())

    result = sumXor(n)

    fptr.write(str(result) + "\n")
    fptr.close()
