export class UpdateUserDto {
  name?: string;
  email?: string;
  password?: string;
  username?: string;
  status?: string;
  emailVerifiedAt?: Date | null;
}
