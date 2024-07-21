import os

#
# Complete the 'gameOfThrones' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#

def gameOfThrones(s):
    # Write your code here
    count = {}
    for c in s:
        if c in count:
            count[c] += 1
        else:
            count[c] = 1

    odd_count = 0
    for c, count in count.items():
        if count % 2 != 0:
            odd_count += 1
        if odd_count > 1:
            return 'NO'

    return 'YES'


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s = input()

    result = gameOfThrones(s)

    fptr.write(result + '\n')
    fptr.close()
