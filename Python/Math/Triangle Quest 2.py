# language: pypy3

for i in range(1, int(input()) + 1):
    print((10 ** i - 1) ** 2 // 81)

# you will face the "wrong answer", if you keep the default comment, and insert a blank line after the code
# the answer is exactly the for loop and the print statement
# so, you don't even need this comment at all