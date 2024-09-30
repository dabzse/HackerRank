import os

#
# Complete the 'gridlandMetro' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER m
#  3. INTEGER k
#  4. 2D_INTEGER_ARRAY track
#

def gridlandMetro(n, m, k, track):
    # Write your code here
    occupied_cells = 0
    track_map = {}

    for r, c1, c2 in track:
        if r not in track_map:
            track_map[r] = []
        track_map[r].append((c1, c2))

    for _, tracks in track_map.items():
        tracks.sort()
        merged_track = []

        current_start, current_end = tracks[0]
        for i in range(1, len(tracks)):
            start, end = tracks[i]
            if start <= current_end:
                current_end = max(current_end, end)
            else:
                merged_track.append((current_start, current_end))
                current_start, current_end = start, end

        merged_track.append((current_start, current_end))

        for start, end in merged_track:
            occupied_cells += end - start + 1

    total_cells = n * m
    return total_cells - occupied_cells


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    m = int(first_multiple_input[1])
    k = int(first_multiple_input[2])

    track = []

    for _ in range(k):
        track.append(list(map(int, input().rstrip().split())))

    result = gridlandMetro(n, m, k, track)

    fptr.write(str(result) + '\n')
    fptr.close()
