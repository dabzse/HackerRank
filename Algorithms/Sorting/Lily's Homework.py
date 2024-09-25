import os

#
# Complete the 'lilysHomework' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY arr as parameter.
#

def lilysHomework(arr):
    # Write your code here
    def count_swaps(sorted_arr):
        swaps = 0
        visited = {i: False for i in range(len(arr))}
        value_to_index = {v: i for i, v in enumerate(sorted_arr)}

        for i, v in enumerate(sorted_arr):
            if visited[i] or v == arr[i]:
                continue

            j = i
            cycle_size = 0
            while not visited[j]:
                visited[j] = True
                j = value_to_index[arr[j]]
                cycle_size += 1

            if cycle_size > 1:
                swaps += cycle_size - 1

        return swaps

    ascending_arr = sorted(arr)
    descending_arr = sorted(arr, reverse=True)

    return min(count_swaps(ascending_arr), count_swaps(descending_arr))

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    arr = list(map(int, input().rstrip().split()))

    result = lilysHomework(arr)

    fptr.write(str(result) + '\n')
    fptr.close()
