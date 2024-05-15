import os

#
# Complete the 'climbingLeaderboard' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts following parameters:
#  1. INTEGER_ARRAY ranked
#  2. INTEGER_ARRAY player
#


def climbingLeaderboard(ranked, player):
    # Write your code here
    ranked_set = sorted(set(ranked), reverse=True)

    def find_rank(score):
        low, high = 0, len(ranked_set) - 1
        while low <= high:
            mid = (low + high) // 2
            if ranked_set[mid] == score:
                return mid + 1
            elif ranked_set[mid] < score:
                high = mid - 1
            else:
                low = mid + 1
        return low + 1

    return [find_rank(p) for p in player]


if __name__ == "__main__":
    ranked_count = int(input().strip())
    ranked = list(map(int, input().rstrip().split()))

    player_count = int(input().strip())
    player = list(map(int, input().rstrip().split()))

    result = climbingLeaderboard(ranked, player)
    for r in result:
        print(r)
