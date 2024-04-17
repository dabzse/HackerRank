def reverse_array(arr):
    result = arr[::-1]
    return result


arr_count = int(input())
arr = list(map(int, input().rstrip().split()))
result = reverse_array(arr)
print(*result)
