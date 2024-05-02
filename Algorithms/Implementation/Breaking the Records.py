import os

#
# Complete the 'breakingRecords' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts INTEGER_ARRAY scores as parameter.
#

def breakingRecords(scores):
    # Write your code here
    highest, lowest = scores[0], scores[0]
    highest_count, lowest_count = 0, 0
    for score in scores:
        if score > highest:
            highest = score
            highest_count += 1
        elif score < lowest:
            lowest = score
            lowest_count += 1
    return highest_count, lowest_count


if __name__ == '__main__':

    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    scores = list(map(int, input().rstrip().split()))

    result = breakingRecords(scores)

    fptr.write(' '.join(map(str, result)))
    fptr.write('\n')

    fptr.close()
