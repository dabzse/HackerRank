# language: pypy3

if __name__ == '__main__':
    n = int(input())
    arr = map(int, input().split())

    sec_max = list(arr)
    print(max([x for x in sec_max if x != max(sec_max)]))
