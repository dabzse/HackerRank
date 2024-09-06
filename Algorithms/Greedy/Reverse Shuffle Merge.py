import os

#
# Complete the 'reverseShuffleMerge' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#

def reverseShuffleMerge(s):
    # Write your code here
    char_count = {}
    for char in s:
        if char in char_count:
            char_count[char] += 1
        else:
            char_count[char] = 1

    used_chars = {}
    remaining_chars = dict(char_count)
    result = []

    def can_use(char):
        return used_chars.get(char, 0) < char_count[char] // 2

    def can_pop(char):
        needed_chars = char_count[char] // 2 - used_chars.get(char, 0)
        return remaining_chars[char] > needed_chars

    for char in reversed(s):
        if can_use(char):
            while result and result[-1] > char and can_pop(result[-1]):
                removed_char = result.pop()
                used_chars[removed_char] -= 1

            result.append(char)
            used_chars[char] = used_chars.get(char, 0) + 1

        remaining_chars[char] -= 1

    return "".join(result)


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s = input()

    result = reverseShuffleMerge(s)

    fptr.write(result + '\n')
    fptr.close()
