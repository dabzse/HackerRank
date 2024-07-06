import os

#
# Complete the 'alternate' function below.
#
# The function is expected to return an INTEGER.
# The function accepts STRING s as parameter.
#

def alternate(s):
    # Write your code here
    unique_chars = set(s)
    max_len = 0

    for char1 in unique_chars:
        for char2 in unique_chars:
            if char1 != char2:
                filtered_str = [c for c in s if c == char1 or c == char2]
                if all(
                    filtered_str[i] != filtered_str[i + 1]
                    for i in range(len(filtered_str) - 1)
                ):
                    max_len = max(max_len, len(filtered_str))

    return max_len


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    l = int(input().strip())
    s = input()

    result = alternate(s)

    fptr.write(str(result) + '\n')
    fptr.close()
