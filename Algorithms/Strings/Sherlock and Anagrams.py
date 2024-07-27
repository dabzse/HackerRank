import os

#
# Complete the 'sherlockAndAnagrams' function below.
#
# The function is expected to return an INTEGER.
# The function accepts STRING s as parameter.
#

def sherlockAndAnagrams(s):
    # Write your code here
    from collections import defaultdict

    substr_freq = defaultdict(int)

    n = len(s)
    for i in range(n):
        for j in range(i + 1, n + 1):
            substr = s[i:j]
            sorted_substr = "".join(sorted(substr))
            substr_freq[sorted_substr] += 1

    anagram_pairs = 0
    for key in substr_freq:
        count = substr_freq[key]
        if count > 1:
            anagram_pairs += (count * (count - 1)) // 2

    return anagram_pairs


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        s = input()

        result = sherlockAndAnagrams(s)

        fptr.write(str(result) + '\n')

    fptr.close()
