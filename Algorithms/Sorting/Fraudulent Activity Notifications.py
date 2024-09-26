import os

#
# Complete the 'activityNotifications' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY expenditure
#  2. INTEGER d
#

def activityNotifications(expenditure, d):
    # Write your code here
    def find_median(counts, d):
        count = 0
        median_pos1 = None
        median_pos2 = None

        if d % 2 == 1:
            median_pos1 = d // 2 + 1
        else:
            median_pos1 = d // 2
            median_pos2 = median_pos1 + 1

        median1 = None
        median2 = None

        for i in range(201):
            count += counts[i]

            if median1 is None and count >= median_pos1:
                median1 = i

            if median2 is None and median_pos2 and count >= median_pos2:
                median2 = i

            if median1 is not None and (median2 is not None or d % 2 == 1):
                break

        if d % 2 == 1:
            return median1
        else:
            return (median1 + median2) / 2

    notifications = 0
    counts = [0] * 201

    for i in range(d):
        counts[expenditure[i]] += 1

    for i in range(d, len(expenditure)):
        median = find_median(counts, d)

        if expenditure[i] >= 2 * median:
            notifications += 1

        counts[expenditure[i]] += 1
        counts[expenditure[i - d]] -= 1

    return notifications


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    d = int(first_multiple_input[1])

    expenditure = list(map(int, input().rstrip().split()))

    result = activityNotifications(expenditure, d)

    fptr.write(str(result) + '\n')
    fptr.close()
