import os

#
# Complete the 'isValid' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#

def isValid(s):
    # Write your code here
    char_count = {}
    for char in s:
        char_count[char] = char_count.get(char, 0) + 1

    freq_count = {}
    for count in char_count.values():
        freq_count[count] = freq_count.get(count, 0) + 1

    if len(freq_count) == 1:
        return "YES"
    elif len(freq_count) == 2:
        freq_list = list(freq_count.keys())
        if 1 in freq_count and freq_count[1] == 1:
            return "YES"
        elif abs(freq_list[0] - freq_list[1]) == 1 and (freq_count[freq_list[0]] == 1 or freq_count[freq_list[1]] == 1):
            return "YES"
    return "NO"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s = input()

    result = isValid(s)

    fptr.write(result + '\n')
    fptr.close()
