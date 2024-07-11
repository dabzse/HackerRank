import os

#
# Complete the 'weightedUniformStrings' function below.
#
# The function is expected to return a STRING_ARRAY.
# The function accepts following parameters:
#  1. STRING s
#  2. INTEGER_ARRAY queries
#

def weightedUniformStrings(s, queries):
    # Write your code here
    alphabet = 'abcdefghijklmnopqrstuvwxyz'
    weights = set()
    prev_char = ''
    count = 0

    for char in s:
        if char == prev_char:
            count += 1
        else:
            count = 1
            prev_char = char
        weights.add((alphabet.index(char) + 1) * count)

    return ['Yes' if query in weights else 'No' for query in queries]


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s = input()

    queries_count = int(input().strip())

    queries = []

    for _ in range(queries_count):
        queries_item = int(input().strip())
        queries.append(queries_item)

    result = weightedUniformStrings(s, queries)

    fptr.write('\n'.join(result))
    fptr.write('\n')

    fptr.close()
