use std::env;
use std::fs::File;
use std::io::{ self, BufRead, Write };

/*
 * Complete the 'activityNotifications' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY expenditure
 *  2. INTEGER d
 */

fn activityNotifications(expenditure: &[i32], d: i32) -> i32
{
    let mut notifications = 0;
    let mut counts = vec![0; 201];

    for i in 0..d as usize
    {
        counts[expenditure[i] as usize] += 1;
    }

    for i in d as usize..expenditure.len()
    {
        let median = find_median(&counts, d);

        if expenditure[i] as f64 >= 2.0 * median
        {
            notifications += 1;
        }

        counts[expenditure[i - d as usize] as usize] -= 1;
        counts[expenditure[i] as usize] += 1;
    }

    notifications
}

fn find_median(counts: &[i32], d: i32) -> f64
{
    let mut count = 0;
    let mut median1 = None;
    let mut median2 = None;

    if d % 2 == 1
    {
        let median_pos = d / 2 + 1;
        for (i, &val) in counts.iter().enumerate()
        {
            count += val;

            if count >= median_pos && median1.is_none()
            {
                return i as f64;
            }
        }
    }

    else
    {
        let median_pos1 = d / 2;
        let median_pos2 = median_pos1 + 1;

        for (i, &val) in counts.iter().enumerate()
        {
            count += val;

            if count >= median_pos1 && median1.is_none()
            {
                median1 = Some(i as f64);
            }

            if count >= median_pos2 && median2.is_none()
            {
                median2 = Some(i as f64);
                break;
            }
        }

        return (median1.unwrap() + median2.unwrap()) / 2.0;
    }

    0.0
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let first_multiple_input: Vec<String> = stdin_iterator.next().unwrap().unwrap()
        .split(' ')
        .map(|s| s.to_string())
        .collect();

    let n = first_multiple_input[0].trim().parse::<i32>().unwrap();

    let d = first_multiple_input[1].trim().parse::<i32>().unwrap();

    let expenditure: Vec<i32> = stdin_iterator.next().unwrap().unwrap()
        .trim_end()
        .split(' ')
        .map(|s| s.to_string().parse::<i32>().unwrap())
        .collect();

    let result = activityNotifications(&expenditure, d);

    writeln!(&mut fptr, "{}", result).ok();
}
