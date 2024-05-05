import os

#
# Complete the 'migratoryBirds' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY arr as parameter.
#

def migratoryBirds(arr):
    # Write your code here
    count_dict = {}
    for bird in arr:
        if bird in count_dict:
            count_dict[bird] += 1
        else:
            count_dict[bird] = 1

    max_count = max(count_dict.values())
    min_bird_type = float("inf")
    for bird, count in count_dict.items():
        if count == max_count and bird < min_bird_type:
            min_bird_type = bird

    return min_bird_type


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    arr_count = int(input().strip())
    arr = list(map(int, input().rstrip().split()))

    result = migratoryBirds(arr)

    fptr.write(str(result) + '\n')
    fptr.close()
