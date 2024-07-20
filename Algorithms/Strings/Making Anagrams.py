import os

#
# Complete the 'makingAnagrams' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. STRING s1
#  2. STRING s2
#

def makingAnagrams(s1, s2):
    # Write your code here
    char_freq = {}

    for char in s1:
        char_freq[char] = char_freq.get(char, 0) + 1

    for char in s2:
        char_freq[char] = char_freq.get(char, 0) - 1

    deletions = sum(abs(freq) for freq in char_freq.values())

    return deletions


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s1 = input()
    s2 = input()

    result = makingAnagrams(s1, s2)

    fptr.write(str(result) + '\n')
    fptr.close()
