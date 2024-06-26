import os

#
# Complete the 'designerPdfViewer' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY h
#  2. STRING word
#

def designerPdfViewer(h, word):
    # Write your code here
    max = 0
    for i in word:
        if h[ord(i) - 97] > max:
            max = h[ord(i) - 97]
    return max * len(word)


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    h = list(map(int, input().rstrip().split()))
    word = input()
    result = designerPdfViewer(h, word)

    fptr.write(str(result) + '\n')
    fptr.close()
