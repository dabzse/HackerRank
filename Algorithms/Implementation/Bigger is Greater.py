import os

#
# Complete the 'biggerIsGreater' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING w as parameter.
#

def biggerIsGreater(w):
    # Write your code here
    w = list(w)

    i = len(w) - 1
    while i > 0 and w[i - 1] >= w[i]:
        i -= 1
    if i <= 0:
        return "no answer"

    pivot = i - 1
    j = len(w) - 1
    while w[j] <= w[pivot]:
        j -= 1

    w[pivot], w[j] = w[j], w[pivot]
    w[i:] = w[i:][::-1]

    return "".join(w)

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    T = int(input().strip())

    for T_itr in range(T):
        w = input()

        result = biggerIsGreater(w)

        fptr.write(result + '\n')

    fptr.close()
