# language: pypy3

d = divmod(int(input()), int(input()))
print(*d, d, sep='\n')
