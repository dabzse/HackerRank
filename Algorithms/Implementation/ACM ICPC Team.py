import os

#
# Complete the 'acmTeam' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts STRING_ARRAY topic as parameter.
#

def acmTeam(topic):
    # Write your code here
    rows, cols = len(topic), len(topic[0])
    matrix = topic
    max_topics = 0
    max_teams = 0

    for i in range(rows):
        for j in range(i + 1, rows):
            topics_known = bin(int(matrix[i], 2) | int(matrix[j], 2)).count("1")
            if topics_known > max_topics:
                max_topics = topics_known
                max_teams = 1
            elif topics_known == max_topics:
                max_teams += 1

    return [max_topics, max_teams]

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()
    n = int(first_multiple_input[0])
    m = int(first_multiple_input[1])

    topic = []

    for _ in range(n):
        topic_item = input()
        topic.append(topic_item)

    result = acmTeam(topic)

    fptr.write('\n'.join(map(str, result)))
    fptr.write('\n')
    fptr.close()
