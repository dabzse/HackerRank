import os

#
# Complete the 'minimumNumber' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. STRING password
#

def minimumNumber(n, password):
    # Return the minimum number of characters to make the password strong
    count = 0
    criteria = 0

    if not any(char.islower() for char in password):
        criteria += 1
    if not any(char.isupper() for char in password):
        criteria += 1
    if not any(char.isdigit() for char in password):
        criteria += 1
    if not any(char in "!@#$%^&*()-+" for char in password):
        criteria += 1

    count = max(criteria, 6 - n)

    return count

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    password = input()
    answer = minimumNumber(n, password)

    fptr.write(str(answer) + '\n')
    fptr.close()
