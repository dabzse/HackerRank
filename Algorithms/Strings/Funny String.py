import os

#
# Complete the 'funnyString' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#

def funnyString(s):
    # Write your code here
    return 'Funny' if all(abs(ord(s[i]) - ord(s[i-1])) == abs(ord(s[-i]) - ord(s[-i-1])) for i in range(1, len(s))) else 'Not Funny'

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        s = input()

        result = funnyString(s)

        fptr.write(result + '\n')

    fptr.close()
