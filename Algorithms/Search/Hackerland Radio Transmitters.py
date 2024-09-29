import os

#
# Complete the 'hackerlandRadioTransmitters' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY x
#  2. INTEGER k
#

def hackerlandRadioTransmitters(x, k):
    # Write your code here
    x.sort()
    i = 0
    n = len(x)
    transmitters = 0

    while i < n:
        transmitters += 1
        loc = x[i] + k
        while i < n and x[i] <= loc:
            i += 1

        loc = x[i - 1] + k
        while i < n and x[i] <= loc:
            i += 1

    return transmitters


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])
    x = list(map(int, input().rstrip().split()))

    result = hackerlandRadioTransmitters(x, k)

    fptr.write(str(result) + '\n')
    fptr.close()
